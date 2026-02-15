// Media Filter JavaScript
console.log('Media filter script loaded');

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM is ready');
    
    // Get elements
    const btnAll = document.getElementById('btn-all');
    const btnImages = document.getElementById('btn-images');
    const btnVideos = document.getElementById('btn-videos');
    const imagesGallery = document.getElementById('images-gallery');
    const videosGallery = document.getElementById('videos-gallery');
    
    console.log('Elements found:', {
        btnAll: btnAll,
        btnImages: btnImages,
        btnVideos: btnVideos,
        imagesGallery: imagesGallery,
        videosGallery: videosGallery
    });
    
    // Show all function
    function showAll() {
        console.log('Showing all');
        if (imagesGallery) imagesGallery.style.display = 'block';
        if (videosGallery) videosGallery.style.display = 'block';
        
        // Update button styles
        if (btnAll) btnAll.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-red-600 text-white';
        if (btnImages) btnImages.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300';
        if (btnVideos) btnVideos.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300';
    }
    
    // Show images only function
    function showImages() {
        console.log('Showing images only');
        if (imagesGallery) imagesGallery.style.display = 'block';
        if (videosGallery) videosGallery.style.display = 'none';
        
        // Update button styles
        if (btnAll) btnAll.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300';
        if (btnImages) btnImages.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-blue-600 text-white';
        if (btnVideos) btnVideos.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300';
    }
    
    // Show videos only function
    function showVideos() {
        console.log('Showing videos only');
        if (imagesGallery) imagesGallery.style.display = 'none';
        if (videosGallery) videosGallery.style.display = 'block';
        
        // Update button styles
        if (btnAll) btnAll.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300';
        if (btnImages) btnImages.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300';
        if (btnVideos) btnVideos.className = 'px-6 py-2 rounded-full font-medium transition-all duration-300 bg-purple-600 text-white';
    }
    
    // Add click events
    if (btnAll) {
        btnAll.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('All button clicked');
            showAll();
        });
    }
    
    if (btnImages) {
        btnImages.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Images button clicked');
            showImages();
        });
    }
    
    if (btnVideos) {
        btnVideos.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Videos button clicked');
            showVideos();
        });
    }
    
    // Make functions global
    window.showAll = showAll;
    window.showImages = showImages;
    window.showVideos = showVideos;
    
    console.log('Media filter initialized');
});
