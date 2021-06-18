document.addEventListener("click", function(e) {
    if (e.target.id == "note") {
     Swal.fire({
        title: 'Что будем делать?',
        icon: 'question',
        showCancelButton: false,
        showDenyButton: true,
        denyButtonText: 'Удалить',
        confirmButtonText: 'Добавить / удалить из избранного',
        confirmButtonColor: '#3085d6',
        denyButtonColor: '#d33',
      }).then((result) => {
        if (result.isConfirmed) {
          location="/MyToDo/diary/bookmarks/"+e.target.dataset.id;
        } 

        if (result.isDenied)
        {
            location="/MyToDo/diary/delete/"+e.target.dataset.id;
        }
      })
    }
  });

function isDate(select) {
    if(select.value != "day")
    {
        if (!document.querySelector("#inpDate").classList.contains("date-visab"))
        {
            document.querySelector("#inpDate").classList.add("date-visab");
        }
    }
    else
    {
        document.querySelector("#inpDate").classList.remove("date-visab");
    }
}