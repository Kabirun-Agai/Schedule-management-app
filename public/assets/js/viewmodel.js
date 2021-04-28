function AppViewModel() {
    this.ti = ko.observable("");
    this.isTrue = ko.computed(function() {
    return this.firstName() + " " + this.lastName();    
　　}, this);
}

// Activates knockout.js
ko.applyBindings(new AppViewModel());