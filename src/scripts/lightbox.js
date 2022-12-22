import "fslightbox"

const links = document.querySelectorAll('.wp-block-image a') || []
links.forEach(link => {
  link.setAttribute("data-fslightbox", "gallery")
})
const links2 = document.querySelectorAll('.kb-gallery-figure a') || []
links2.forEach(link => {
  link.setAttribute("data-fslightbox", "gallery")
})
refreshFsLightbox();
