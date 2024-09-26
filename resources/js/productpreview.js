const image = document.getElementById('zoom-image');

image.addEventListener('mousemove', (e) => {
  const { left, top, width, height } = image.getBoundingClientRect();
  const x = (e.clientX - left) / width * 100;
  const y = (e.clientY - top) / height * 100;
  
  image.style.transformOrigin = `${x}% ${y}%`;
  image.style.transform = 'scale(2)'; // Zoom level
});

image.addEventListener('mouseleave', () => {
  image.style.transform = 'scale(1)';
});

const colors = document.querySelectorAll('.color'); 

colors.forEach((color) => {
  color.addEventListener('click', function() {
    colors.forEach((col) => {
      col.classList.remove('p-1', 'border-[2px]', 'rounded-lg', 'border-blue-300', 'dark:border-blue-500');
    });
    color.classList.add('p-1', 'border-[2px]', 'rounded-lg', 'border-blue-300', 'dark:border-blue-500');
  });
});
const thumbnailImages = document.querySelectorAll('.thumbnail-images img'); 
const mainThumbanail = document.querySelector('.main-thumbnail'); 

thumbnailImages.forEach((thumbnailImage) => {
  thumbnailImage.addEventListener('click', function() {

    thumbnailImages.forEach((thumbnail) => {
      thumbnail.parentElement.classList.remove('p-1', 'border-[2px]', 'rounded-lg', 'border-blue-300', 'dark:border-blue-500');
    });

    mainThumbanail.src = thumbnailImage.src;

    thumbnailImage.parentElement.classList.add('p-1', 'border-[2px]', 'rounded-lg', 'border-blue-300', 'dark:border-blue-500');
  });
});
