<x-Admin.master title="Dashboard">
    <h6 class="upcomming mb-4">Acceuil</h6>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3 ">
                <div class="card bg-c-blue order-card shadow">
                    <div class="card-block">
                        <h6 class="mb-3">Commandes reçues</h6>
                        <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span
                                class="f-right">{{ $nb_commande }}</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card shadow">
                    <div class="card-block">
                        <h6 class="mb-3">Revenue (MAD)</h6>
                        <h2 class="text-right"><i class="fa-solid fa-dollar-sign f-left"></i><span
                                class="f-right ">{{ $total }}</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card shadow">
                    <div class="card-block">
                        <h6 class="mb-3">Totale Employés</h6>
                        <h2 class="text-right"><i class="fa-solid fa-users f-left"></i><span
                                class="f-right">{{ $nb_employe }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-pink order-card shadow">
                    <div class="card-block">
                        <h6 class="mb-3">Totale Pltas</h6>
                        <h2 class="text-right"><i class="fa-solid fa-utensils f-left"></i><span
                                class="f-right">{{ $nb_plat }}</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-6">
                <div style="height:50vh;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/dycalendarjs@1.2.1/js/dycalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const statistiques = Object.values({!! $statistiques !!});

        const data = {
            labels: ['janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre',
                'Novembre', 'Decembre'
            ],
            datasets: [{
                label: 'revenu mensuel',
                data: statistiques,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
                borderColor: [
                    'gray',
                ],
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 15,
                hoverOffset: 4,
            }]
        }
        const config = {
            type: 'line',
            data: data,
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'REVENU MENSUEL',
                        font: {
                            size: 20
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 14,
                            }
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 16
                            }
                        }
                    }
                },
            }
        };
        new Chart(ctx, config, data);
    </script>
</x-Admin.master>
