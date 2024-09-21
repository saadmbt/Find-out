document.addEventListener('DOMContentLoaded', function() {
    const resultsList = document.getElementById('results-list');

    // Sample data for integrations
    fetch('get_offers.php')
    .then(response => response.json())
    .then(data => {
        const offersDiv = document.getElementById('offers');
        data.forEach(offer => {
            const offerDiv = document.createElement('div');
            offerDiv.className = 'offer';
            offerDiv.innerHTML = `
                <h2>${offer.title}</h2>
                <p>${offer.description}</p>
                <button onclick="bookOffer(${offer.id})">Book Now</button>
            `;
            offersDiv.appendChild(offerDiv);
        });
    });

function bookOffer(offerId) {
    fetch('book_offer.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ offer_id: offerId })
    }).then(response => response.json())
      .then(data => {
          if (data.success) {
              alert('Offer booked successfully!');
          } else {
              alert('Failed to book offer.');
          }
      });
}

    // Function to display integrations
    

    // Initial display of integrations
    displayIntegrations(integrations);

    // Filter functionality
    const filterCheckboxes = document.querySelectorAll('.filter-panel input[type="checkbox"]');
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedCategories = Array.from(filterCheckboxes)
                                            .filter(checkbox => checkbox.checked)
                                            .map(checkbox => checkbox.id.replace('-', ' '));
            const filteredIntegrations = integrations.filter(integration => 
                selectedCategories.includes(integration.category)
            );
            displayIntegrations(filteredIntegrations.length > 0 ? filteredIntegrations : integrations);
        });
    });
});
