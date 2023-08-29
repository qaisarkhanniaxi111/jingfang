<!DOCTYPE html>
<html>
<head>
    <title>Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="row">

    @foreach ($groups as $index => $group)
    <div class="col-lg-4">
        <canvas id="barChart{{ $index }}" style="max-width:400px; max-height:200px"></canvas>

        <script>
            var ctx{{ $index }} = document.getElementById('barChart{{ $index }}').getContext('2d');
            var barChart{{ $index }} = new Chart(ctx{{ $index }}, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dates[$index]) !!},
                    datasets: [{
                        label: '{{ $group }}',
                        data: {!! json_encode($percent[$index]) !!},
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        borderColor: 'rgba(0, 123, 255, 1)',
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
        </script>
      </div>
    @endforeach
</body>
</html>
