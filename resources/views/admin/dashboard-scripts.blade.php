<script>
    const ctx1 = document.getElementById('activitiesChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Projets',
                    data: @json($projectsPerMonth),
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0,123,255,0.2)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Podcasts',
                    data: @json($podcastsPerMonth),
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40,167,69,0.2)',
                    tension: 0.4,
                    fill: true
                }
            ]
        },
        options: { responsive: true, plugins: { legend: { position: 'top' } } }
    });

    const ctx2 = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Projets', 'Podcasts', 'Utilisateurs'],
            datasets: [{
                data: [{{ $projectsCount }}, {{ $podcastsCount }}, {{ $usersCount ?? 0 }}],
                backgroundColor: ['#007bff', '#28a745', '#ffc107']
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });
</script>
