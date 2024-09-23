document.getElementById('thumbnail-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('thumbnail-preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

let selectedFiles = [];

document.getElementById('collection-input').addEventListener('change', function(event) {
    const previewContainer = document.getElementById('preview-container');
    const files = Array.from(event.target.files);

    previewContainer.innerHTML = '';
    selectedFiles = [];

    files.forEach((file, index) => {
        selectedFiles.push(file);

        const imgElement = document.createElement('img');
        imgElement.src = URL.createObjectURL(file);
        imgElement.classList.add('w-full', 'h-full', 'object-cover', 'rounded-md');

        const wrapper = document.createElement('div');
        wrapper.classList.add('relative', 'w-[193px]', 'h-[193px]', 'cursor-pointer', 'border-[1px]', 'border-gray-200', 'p-2', 'rounded-md');
        wrapper.setAttribute('data-index', index);

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.classList.add('absolute', 'w-[20px]', 'h-[20px]', 'rounded-full', 'flex', 'items-center', 'justify-center', 'bg-[#FF6D0A]', '-right-2', '-top-2');
        removeBtn.innerHTML = "<i class='bx bx-x text-[20px] text-white'></i>";

        removeBtn.addEventListener('click', function() {
            const fileIndex = parseInt(wrapper.getAttribute('data-index'), 10);
            selectedFiles.splice(fileIndex, 1);

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            document.getElementById('collection-input').files = dataTransfer.files;
            
            wrapper.remove(); 
        });

        wrapper.appendChild(imgElement);
        wrapper.appendChild(removeBtn);

        previewContainer.appendChild(wrapper);
    });
});