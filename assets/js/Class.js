function Class(id, name, limit) {
  this.id = id;
  this.name = name;
  this.limit = limit;
}

Class.prototype.BuildFromObj = function(obj){
  for (var prop in obj){
    this[prop] = obj[prop];
  }
};

Class.prototype.createDOM = function(){
  return "<div class='row table-row'>"+
    "<div class='col-sm-4 col-xs-12'>"+
    "<div class='table-element'>"+this.name+"</div></div>"+
    "<div class='col-sm-4 col-xs-8'>"+
    "<input type='hidden' value="+this.id+" id='classid'>"+
    "<input type='number' class='input-limit form-control' value="+this.limit+" data-id="+this.id+">"+
    "</div>"+
    "<div class='col-xs-4'>"+
    "<button type='button' class='btn btn-danger btn-remove' id='"+this.id+"'>Delete</button>"+
    "</div>"+
    "</div>";
};
