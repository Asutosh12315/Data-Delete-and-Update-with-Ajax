function update(id ,rid){

var value=$(id).html();

console.log(rid);
console.log(value);


$.ajax({

   type:"post",
   url:"index.php",
   dataType:"html",
   data:{

      name: value,
      rid: rid

   }
  
});

}
function deleteData() {
    
    var formData=$(".delete_data").attr("id");
     console.log(formData);


     $.ajax({

        type:"post",
        url:"index.php",
        dataType:"html",
        data:{delete_id:formData}
       
     });
}