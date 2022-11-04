 @props(['chartData'])
 <!--Graph Card-->
 <div class="bg-white border-transparent rounded-lg shadow-xl">
     <div
         class="p-2 text-gray-800 uppercase border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg bg-gradient-to-b from-gray-300 to-gray-100">
         <h5 class="font-bold text-gray-600 uppercase"></h5>
         <h5 class="font-bold text-gray-600 uppercase">{{ $chartData['name'] }}</h5>
     </div>
     <div class="p-5">
         <canvas id="chartjs-{{ $chartData['counter'] }}" class="chartjs" width="undefined" height="undefined"></canvas>
         <script>
             var labels = JSON.parse(`<?php echo json_encode($chartData['labels']); ?>`);
             var values = JSON.parse(`<?php echo json_encode($chartData['values']); ?>`);
             var target = JSON.parse(`<?php echo json_encode($chartData['target']); ?>`);
             new Chart(document.getElementById("chartjs-{{ $chartData['counter'] }}"), {
                 "type": "line",
                 "data": {
                     "labels": labels,
                     "datasets": [{
                             "label": "data",
                             "data": values,
                             "fill": false,
                             //"borderColor": "rgb(75, 192, 192)",
                             "borderColor": "#" + Math.floor(Math.random() * 16777215).toString(16),
                             "lineTension": 0.1
                         },
                         {

                             "label": "Target",
                             "data": target,
                             "fill": false,
                             "borderColor": "#" + Math.floor(Math.random() * 16777215).toString(16),
                             "lineTension": 0.1
                         }
                     ]
                 },
                 "options": {}
             });
         </script>
     </div>
 </div>
 <!--/Graph Card-->
