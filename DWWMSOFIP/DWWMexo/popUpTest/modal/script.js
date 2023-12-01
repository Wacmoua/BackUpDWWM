



function afficher (){
    document.getElementById('maModal').style.display="block";
};

function masquer (){
    document.getElementById('maModal').style.display="none";
};

const darkModeToggle = document.getElementById('dark-mode-toggle');
        const body = document.body;

        function toggleDarkMode() {
            if (darkModeToggle.checked) {
                body.classList.add('dark-mode');
                // Vous pouvez ajouter d'autres actions ici, si nécessaire pour le mode sombre
            } else {
                body.classList.remove('dark-mode');
                // Vous pouvez ajouter d'autres actions ici, si nécessaire pour le mode clair
            }
        }