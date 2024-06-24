$.fn.imageUploader = function (options) {
  const {
    preloadedImages = [],
    template = "<img src=':image:'>",
    maxImages = 20,
    imageArea = $("#image-area")
  } = options;

  const imageInput = this;
  const defaultImageArea = imageArea.html();

  const updateImageInputFiles = (files) => {
    const dataTransfer = new DataTransfer();
    files.forEach(file => dataTransfer.items.add(file));
    imageInput.each(function () {
      this.files = dataTransfer.files;
    });
  };

  const displayImage = (imageFile) => {
    const imageSrc = URL.createObjectURL(imageFile);
    const imgElement = $(template.replace(":image:", imageSrc));
    imageArea.append(imgElement);
    imgElement.on('load', () => {
      URL.revokeObjectURL(imageSrc);
    });
  };

  const loadPreloadedImage = (imageUrls) => {
    const dataTransfer = new DataTransfer();
    let processedImages = 0;

    const processImage = async (url) => {
      try {
        const response = await fetch(url);
        const blob = await response.blob();
        const file = new File([blob], `preloaded-${processedImages}`, {
          type: "image/jpeg",
          lastModified: Date.now()
        });

        dataTransfer.items.add(file);
        displayImage(file);

        processedImages++;
        if (processedImages === imageUrls.length) {
          updateImageInputFiles(Array.from(dataTransfer.files));
        }
      } catch (error) {
        console.error('Error fetching image:', error);
      }
    };

    imageUrls.slice(0, maxImages).forEach(processImage);
  };

  imageInput.on('change', function () {
    let files = Array.from(this.files).slice(0, maxImages);
    if (files.length > maxImages) {
      console.warn(`Warning: Only the first ${maxImages} images will be uploaded.`);
    }

    imageArea.empty();
    if (files.length === 0) {
      imageArea.append(defaultImageArea);
      return;
    }

    files.forEach(displayImage);
    updateImageInputFiles(files);
  });

  if (preloadedImages.length > 0) {
    imageArea.empty();
    loadPreloadedImage(preloadedImages);
  }

  return this;
};
