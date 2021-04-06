<?php
class Model_Calender extends Model_Crud
{
    // 週の開始曜日
    public $start_day = 0; // 0:日曜,1:月曜...
 
    // テンプレート
    public $template = array(
        'cal_open'       => '',
        'week_row_start' => '',
        'week_cell'      => '',
        'week_row_end'   => '',
        'day_head_start' => '',
        'day_row_start'  => '',
        'day_cell'       => '',
        'day_row_end'    => '',
        'day_head_end'   => '',
        'cal_close'      => '<table><thead><tr><td>%s</td></tr></thead><tbody><tr><td>%s</td></tr></tbody></table>'
    );
 
    // 週のラベル
    public $week_label = array('日', '月', '火', '水', '木', '金', '土');
 
    // 年月調整
    public function adjust_date($year, $month)
    {
        $date = array(
            'month' => intval($month),
            'year'  => intval($year),
        );
 
        // 範囲外
        if ( strlen($date['year']) != 4 || $month < 1 )
        {
            $dt = new \DateTime();
            $date['year']  = $dt->format('Y');
            $date['month'] = $dt->format('n');
        }
        elseif ( $month > 12 )
        {
            $date['month'] = $date['month'] - 12;
            $date['year']  += 1;
        }
        return $date;
    }
 
    // カレンダー配列の生成
    public function generate($year = 0, $month = 0)
    {
        $html = array();
 
        // 年月調整
        $date  = $this->adjust_date($year, $month);
        $year  = $date['year'];
        $month = $date['month'];
 
        // 初日
        $first_dt = new \DateTime($year.'-'.$month.'-01');
        $first_w  = $first_dt->format('w');
 
        // カレンダー開始位置
        if ( $first_w == $this->start_day )
        {
            $start_index = 0;
        }
        elseif ( $first_w > $this->start_day )
        {
            $start_index = abs($this->start_day - $first_w);
        }
        else
        {
            $start_index = $first_w - $this->start_day + 7;
        }
 
        // 週の行数
        $days = $first_dt->format('t') + $start_index;
        $week_rows = ceil($days / 7);
 
        // 日付配列の生成
        $cells = array();
        $start_dt = new \DateTime($year.'-'.$month.'-01');
        $start_dt->modify('-'.$start_index.' day');
        for( $i = 0; $i < ($week_rows * 7); $i++ )
        {
            $cells[$start_dt->format('Y-m-d')] = clone $start_dt;
            $start_dt->modify('+1 day');
        }
 
        return $cells;
    }
 
    // カレンダーHTMLの生成
    public function publish($year = 0, $month = 0)
    {
        // カレンダー配列
        $cells = $this->generate($year, $month);
 
        // テーブル生成
        $html = array();
        $html[] = $this->template['cal_open'];
        $html[] = $this->template['week_row_start'];
        for( $i = 0; $i < 7; $i++ )
        {
            $week = ($this->start_day + $i) % 7;
            $html[] = sprintf($this->template['week_cell'], $this->week_label[$week]);
        }
        $html[] = $this->template['week_row_end'];
        $html[] = $this->template['day_head_start'];
        $day_counter = 1;
        foreach( $cells as $dt )
        {
            if ( $day_counter === 1 )
            {
                $html[] = $this->template['day_row_start'];
            }
            $html[] = sprintf($this->template['day_cell'], $dt->format('d'));
            $day_counter++;
            if ( $day_counter > 7 )
            {
                $html[] = $this->template['day_row_end'];
                $day_counter = 1;
            }
        }
        $html[] = $this->template['day_head_end'];
        $html[] = $this->template['cal_close'];
 
        return implode("\n", $html);
    }
}