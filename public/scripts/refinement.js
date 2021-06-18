document.addEventListener("click", function(e) {
  if (e.target.id == "btn-delete-group") {
  Swal.fire({
    title: 'Вы действительно хотите удалить группу?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Да, конечно!',
    cancelButtonText: 'Нет, отмена!',
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
  }).then((result) => {
    if (result.isConfirmed) {
      location="/MyToDo/groupTask/delete/"+e.target.dataset.id;
    } 
  })
}
});