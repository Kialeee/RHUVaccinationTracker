let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

sidebar.classList.toggle("open");
closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});


//folowing are the code to change sidebar button(optional)

function menuBtnChange(){
  if(sidebar.classList.contains("open")){
    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    
  }else{
    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
}