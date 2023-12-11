// $('.slide').slick({
//   infinite: true,
//   slidesToShow: 1,
//   slidesToScroll: 1
// });


// User Options Open/Close
let user_options_btn = document.querySelector('.avatar .user-options-btn');
let user_options = document.querySelector('.avatar .user-options');
let user_options_head = document.querySelector('.avatar .user-options .head');
window.addEventListener('mouseup',function(event){
    if(user_options_btn == event.target.closest(".avatar .user-options-btn")){
        user_options.classList.toggle('show');
    }else{
        if(event.target == user_options_head || event.target.closest(".user-options .head") == user_options_head){
            return false;
        }else if(event.target != user_options && event.target.parentNode != user_options){
            user_options.classList.remove("show");
        }
    }
}); 







// Menu Active
const hrefs = document.querySelectorAll('.side-menu ul li a');
for(let i = 0; i < hrefs.length; i++){
    if(window.location.pathname === hrefs[i].pathname){
        hrefs[i].closest("li.tree").classList.add("active");
        hrefs[i].classList.add("active");
        if(hrefs[i].closest('li.tree ul')){
            hrefs[i].closest('li.tree ul').classList.add('show');
        }
    }
}
