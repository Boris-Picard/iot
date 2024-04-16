</div>
</div>
</div>
</main>
<footer></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<?php if (isset($viewModule)) { ?>
    <script src="/public/assets/js/value.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script>
        const chart = () => {
            const ctx = document.getElementById('myChart');
            console.log(values);
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: timestamps,
                    datasets: [{
                        label: '# of Votes',
                        data: values.map((val) => {
                            return val
                        }),
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        chart();
    </script>
<?php } ?>
<?php var_dump($getModule); ?>
</body>

</html>