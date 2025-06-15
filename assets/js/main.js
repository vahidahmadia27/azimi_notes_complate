function openCity(evt, tabs) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabs).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("open").click();

document.addEventListener("DOMContentLoaded", function () {
  var viewNoteModal = document.getElementById("viewNoteModal");
  viewNoteModal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget;

    var title = button.getAttribute("data-title");
    var caption = button.getAttribute("data-caption");
    var image = button.getAttribute("data-image");
    var created = button.getAttribute("data-created");
    var bookmark = button.getAttribute("data-bookmark");

    document.getElementById("noteTitle").textContent = title;
    document.getElementById("noteCaption").textContent = caption;
    document.getElementById("noteCreated").textContent = created;
    document.getElementById("noteBookmark").textContent = bookmark;

    var noteImage = document.getElementById("noteImage");
    if (image) {
      noteImage.src = image;
      noteImage.style.display = "block";
    } else {
      noteImage.style.display = "none";
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var viewNoteModal = document.getElementById("editModalNotes");

  viewNoteModal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget;

    var title = button.getAttribute("data-title") || "";
    var caption = button.getAttribute("data-caption") || "";
    var image = button.getAttribute("data-image") || "";
    var created = button.getAttribute("data-created") || "";
    var bookmark = button.getAttribute("data-bookmark") || "";
    var noteId = button.getAttribute("data-id") || "";

    document.getElementById("edit-noteTitle").value = "";
    document.getElementById("edit-noteCaption").textContent = "";
    document.getElementById("edit-noteDate").value = "";
    document.getElementById("edit-noteBookmark").checked = false;

    document.getElementById("id-edit").value = "";

    document.getElementById("edit-noteTitle").value = title;
    document.getElementById("edit-noteCaption").textContent = caption;
    document.getElementById("edit-noteDate").value = created;
    document.getElementById("editNoteImage").src = image;
    document.getElementById("old-noteImage").value = image;
    document.getElementById("id-edit").value = noteId;

    if (bookmark == "بله") {
      document.getElementById("edit-noteBookmark").checked = true;
    } else {
      document.getElementById("edit-noteBookmark").checked = false;
    }

    if (image) {
      noteImage.textContent = image;
      noteImage.style.display = "block";
    } else {
      noteImage.style.display = "none";
    }
  });
});
