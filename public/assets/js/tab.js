document.addEventListener('DOMContentLoaded', () => {
  const tab = document.getElementById('tab-1');
  new Tab(tab);
});

/**
 * タブ
 * @property {NodeList} toggles タブ要素
 */
function Tab(tab) {
  this.toggles = tab.querySelectorAll('[data-toggle]');
  
  this.handleClick();
}

/**
 * タブをクリックした時の動作
 */
Tab.prototype.handleClick = function() {
  this.toggles.forEach(toggle => {
    toggle.addEventListener('click', event => {
      event.preventDefault();
      // 先にすべて閉じておく
      this.closeAll();
      // リンクの親要素に開いた表現のクラスを追加
      toggle.parentNode.classList.add('is-open');
      // クリックされたタブに対応するコンテンツを表示
      const target = toggle.getAttribute('href');
      const content = document.querySelector(target);
      content.classList.add('is-open');
    });
  });
};

/**
 * タブをすべて閉じる
 */
Tab.prototype.closeAll = function() {
  this.toggles.forEach(toggle => {
    toggle.parentNode.classList.remove('is-open');
    const target = toggle.getAttribute('href');
    const content = document.querySelector(target);
    content.classList.remove('is-open');
  });
};