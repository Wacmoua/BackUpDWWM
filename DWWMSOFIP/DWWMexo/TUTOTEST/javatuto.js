// Obtenez les éléments de sélection
const marqueSelect = document.getElementById("marque");
const modeleSelect = document.getElementById("modele");
const anneeSelect = document.getElementById("annee");

// Données des modèles et années (cet exemple utilise un objet JavaScript, mais vous pouvez également utiliser des tableaux ou des données provenant d'une source externe)
const modelesParMarque = {
  yamaha: ["MT07", "MT09", "MT10","R1","R6","R7","MT03","MT125","Bandit"],
  honda: ["CBR600RR", "CBR", "CBF", "CB500","CBR1000RR","Hornet"]
};

const anneesParModele = {
  cbr600rr: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  cbr1000rr: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  cbr: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  cbf: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  cb500: [1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  mt07: [2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  hornet: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2023,],
  mt09: [2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  mt10: [  2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  r1: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  r6: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],
  bandit: [1998,1999,2000,2001,2022,2003,2004,2005,2006,2007,2008,],
  cbr100rr: [2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020, 2021, 2022,],

};

const donneesMotos = {
  yamaha: {
    MT07: {
      2019: {
        donnees: "Données pour Yamaha MT07 2019",
      },
      // Ajoutez d'autres années et leurs données ici
    },
    MT09: {
      2020: {
        donnees: "Données pour Yamaha MT09 2020",
      },
      // Ajoutez d'autres années et leurs données ici
    },
    // Ajoutez d'autres modèles et leurs données ici
  },
  honda: {
    CBR600RR: {
      2018: {
        donnees: "Données pour Honda CBR600RR 2018",
      },
      // Ajoutez d'autres années et leurs données ici
    },
    // Ajoutez d'autres modèles et leurs données ici
  },
  // Ajoutez d'autres marques et leurs modèles et données ici
};


// Fonction pour mettre à jour les options du menu des modèles
function mettreAJourModeles() {
  const marqueSelectionnee = marqueSelect.value;
  modeleSelect.innerHTML = "";
  
  modelesParMarque[marqueSelectionnee].forEach(modele => {
    const option = document.createElement("option");
    option.value = modele.toLowerCase();
    option.textContent = modele;
    modeleSelect.appendChild(option);
  });

  mettreAJourAnnees();
}

// Fonction pour mettre à jour les options du menu des années
function mettreAJourAnnees() {
  const modeleSelectionne = modeleSelect.value;
  anneeSelect.innerHTML = "";

  anneesParModele[modeleSelectionne].forEach(annee => {
    const option = document.createElement("option");
    option.value = annee;
    option.textContent = annee;
    anneeSelect.appendChild(option);
  });
}

// Écouteurs d'événements pour les changements de sélection
marqueSelect.addEventListener("change", mettreAJourModeles);
modeleSelect.addEventListener("change", mettreAJourAnnees);

// Initialisez les options du premier menu
mettreAJourModeles();

function afficherDonnees() {
  const marqueSelectionnee = marqueSelect.value;
  const modeleSelectionne = modeleSelect.value;
  const anneeSelectionnee = anneeSelect.value;

  if (donneesMotos[marqueSelectionnee] && donneesMotos[marqueSelectionnee][modeleSelectionne] && donneesMotos[marqueSelectionnee][modeleSelectionne][anneeSelectionnee]) {
    const donnees = donneesMotos[marqueSelectionnee][modeleSelectionne][anneeSelectionnee].donnees;
    // Afficher les données ou effectuer d'autres actions en fonction des données sélectionnées
    console.log(donnees);
  } else {
    // Gérer le cas où les données ne sont pas disponibles pour la sélection actuelle
    console.log("Aucune donnée disponible pour cette sélection.");
  }
}

// Ajoutez cet écouteur d'événements pour appeler la fonction lorsque l'utilisateur effectue une sélection
anneeSelect.addEventListener("change", afficherDonnees);

