//Scroll Bar

const scrollBarButton = document.getElementById("scroll-navbar-button");
const scrollBar = document.getElementById("scroll-bar");

function toggleNavBar() {
  scrollBar.classList.toggle('scroll-bar-active');
}

function toggleNavBarAndHref() {
  let top = document.getElementById("Staff").offsetTop;
  window.scrollTo(0, top);
  scrollBar.classList.toggle('scroll-bar-active');
}

// Parallax

window.onload = function() {
  lax.setup()
  const updateLax = () => {
    lax.update(window.scrollY)
    window.requestAnimationFrame(updateLax)
  }
  window.requestAnimationFrame(updateLax)
}

// Display Staff Description

const imageElon = document.getElementById("staff_img_Elon");
const imageBill = document.getElementById("staff_img_Bill");
const imageJeff = document.getElementById("staff_img_Jeff");
const clickElon = document.getElementById("sub-item");
const clickBill = document.getElementById("sub-item2");
const clickJeff = document.getElementById("sub-item3");
const scrollToTopButton = document.getElementById("scroll_to_top");

function displayElon() {
  if (clickElon.style.display == "none") {
    clickElon.style.opacity = "1";
    clickElon.style.display = "block";
    if (clickBill.style.display != "block") {
      imageBill.style.filter = "blur(2px)";
    }
    if (clickJeff.style.display != "block") {
      imageJeff.style.filter = "blur(2px)";
    }
    imageElon.style.transform = "scale(1.05)";
    imageElon.style.filter = "contrast(1.1)";
    imageElon.style.transition = "all 1s";
  } else {
    clickElon.style.display = "none";
    if (clickBill.style.display == "block") {
      imageElon.style.filter = "blur(2px)";
      imageBill.style.filter = "blur(0px)";
      imageBill.style.filter = "contrast(1.1)";
    }
    if (clickJeff.style.display == "block") {
      imageElon.style.filter = "blur(2px)";
      imageJeff.style.filter = "blur(0px)";
      imageJeff.style.filter = "contrast(1.1)";
    }
    if (clickBill.style.display != "block" && clickJeff.style.display != "block") {
      imageElon.style.filter = "contrast(1)";
      imageBill.style.filter = "blur(0px)";
      imageJeff.style.filter = "blur(0px)";
    }
    imageElon.style.transform = "scale(1)";
  }
}

function displayBill() {
  if (clickBill.style.display == "none") {
    clickBill.style.opacity = "1";
    clickBill.style.display = "block";
    if (clickElon.style.display != "block") {
      imageElon.style.filter = "blur(2px)";
    }
    if (clickJeff.style.display != "block") {
      imageJeff.style.filter = "blur(2px)";
    }
    imageBill.style.transform = "scale(1.05)";
    imageBill.style.filter = "contrast(1.1)";
    imageBill.style.transition = "all 1s";
  } else {
    clickBill.style.display = "none";
    if (clickElon.style.display == "block") {
      imageBill.style.filter = "blur(2px)";
      imageElon.style.filter = "blur(0px)";
      imageElon.style.filter = "contrast(1.1)";
    }
    if (clickJeff.style.display == "block") {
      imageBill.style.filter = "blur(2px)";
      imageJeff.style.filter = "blur(0px)";
      imageJeff.style.filter = "contrast(1.1)";
    }
    if (clickElon.style.display != "block" && clickJeff.style.display != "block") {
      imageBill.style.filter = "contrast(1)";
      imageElon.style.filter = "blur(0px)";
      imageJeff.style.filter = "blur(0px)";
    }
    imageBill.style.transform = "scale(1)";
  }
}

function displayJeff() {
  if (clickJeff.style.display == "none") {
    clickJeff.style.opacity = "1";
    clickJeff.style.display = "block";
    if (clickElon.style.display != "block") {
      imageElon.style.filter = "blur(2px)";
    }
    if (clickBill.style.display != "block") {
      imageBill.style.filter = "blur(2px)";
    }
    imageJeff.style.transform = "scale(1.05)";
    imageJeff.style.filter = "contrast(1.1)";
    imageJeff.style.transition = "all 1s";
  } else {
    clickJeff.style.display = "none";
    if (clickElon.style.display == "block") {
      imageJeff.style.filter = "blur(2px)";
      imageElon.style.filter = "blur(0px)";
      imageElon.style.filter = "contrast(1.1)";
    }
    if (clickBill.style.display == "block") {
      imageJeff.style.filter = "blur(2px)";
      imageBill.style.filter = "blur(0px)";
      imageBill.style.filter = "contrast(1.1)";
    }
    if (clickElon.style.display != "block" && clickBill.style.display != "block") {
      imageJeff.style.filter = "contrast(1)";
      imageElon.style.filter = "blur(0px)";
      imageBill.style.filter = "blur(0px)";
    }
    imageJeff.style.transform = "scale(1)";
  }
}

var activeForm = false;
const newsForm = document.getElementById("news_form");

// function showNewsForm() {
//   let formData = '<div class="news_field">' +
//     '<label>Day</label>' +
//     '<input type="number" name="day" id="day" />' +
//     '</div>' +
//     '<div class="news_field">' +
//     '<label>Month</label>' +
//     '<input type="text" name="month" />' +
//     '</div>' +
//     '<div class="news_field">' +
//     '<label>Description</label>' +
//     '<input type="text" name="description" />' +
//     '</div>' +
//     '<button type="submit" name ="add_news" class="btn news">Add</button>';
//   newsForm.innerHTML = formData;
//   activeForm = true;
// }

// function hideNewsForm() {
//   newsForm.innerHTML = "";
//   activeForm = false;
// }

// function toggleForm() {
//   activeForm ? hideNewsForm() : showNewsForm();
// }

const editForm = document.getElementById("edit_form");
var activeEditForm = false;

function showEditForm(id, day, month, description) {
  let formData = '<div class="news_field">' +
    '<label>Day</label>' +
    '<input type="number" name="day" value="' + day + '" />' +
    '</div>' +
    '<div class="news_field">' +
    '<label>Month</label>' +
    '<input type="text" name="month" value="' + month + '" />' +
    '</div>' +
    '<div class="news_field">' +
    '<label>Description</label>' +
    '<input type="text" name="description" value="' + description + '" />' +
    '</div>' +
    '<input type="hidden" name="news_id" value="' + id + '" />' +
    '<button id="edit_news" name ="edit_news" class="btn news">Edit</button>';
  editForm.innerHTML = formData;
  activeEditForm = true;
}

function hideEditForm() {
  editForm.innerHTML = "";
  activeEditForm = false;
}

function toggleEditForm(id, day, month, description) {
  activeEditForm ? hideEditForm() : showEditForm(id, day, month, description);
}

// $(document).ready(function() {
//   $('input[name ="day"]').blur(function() {
//     console.log("blured");
//     let day = $(this).val();
//     $.ajax({
//       url: "check_adding_news.php",
//       method: "POST",
//       data: {
//         day: day
//       },
//       success: function(data) {
//         toastr.info('"' + data + '"');
//       }
//     })
//   })
// });

// Rate Us

function rate(star) {
  if (star == 1) {
    swal("Thank You!", "I am very glad!", "success");
  }
  if (star == 2) {
    swal("Thank You!", "Not bad, I will try better next time!", "success");
  }
  if (star == 3) {
    swal("OK!", "Not good not bad!", "success");
  }
  if (star == 4) {
    swal({
        title: "Are you sure?",
        text: "This project is to good to be rated like that!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("I am sad :(", {
            icon: "success",
          });
        }
      });
  }
  if (star == 5) {
    swal({
        title: "Excuse Me?",
        text: "I think something wrong with you!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("I am very sad :(", {
            icon: "success",
          });
        }
      });
  }
}

// Scroll Button

window.onscroll = function() {
  displayButton();
};

function displayButton() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    scrollToTopButton.style.display = "block";
  } else {
    scrollToTopButton.style.display = "none";
  }
}

function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}