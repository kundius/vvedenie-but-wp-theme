import "fslightbox"

const links = document.querySelectorAll('.wp-block-image a') || []
links.forEach(link => {
  link.setAttribute("data-fslightbox", "gallery")
})
refreshFsLightbox();
