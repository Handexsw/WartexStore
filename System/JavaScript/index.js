var searchQueries = ["MDGram Messenger", "Elemented","Outline","OpenVPN", "WartexStore(App)"];
        var currentIndex = 0;

        function changeSearchQuery() {
            document.getElementById("searchInput").setAttribute("placeholder", searchQueries[currentIndex]);
            currentIndex = (currentIndex + 1) % searchQueries.length;
        }
    var button = document.getElementById('draggableButton');
        setInterval(changeSearchQuery, 3000);

    // JavaScript (или jQuery) для изменения активного класса при клике на ссылку

var images = ["MediaArchive/Antivirus.jpg", "th.jpeg"];
  var currentImageIndex = 0;

  function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    document.getElementById('mainImage').src = images[currentImageIndex];
  }

  function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    document.getElementById('mainImage').src = images[currentImageIndex];
  }

  function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }