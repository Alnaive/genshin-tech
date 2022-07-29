<template>
    <apexcharts  width="500"  height="350" type="bar" class="text-green-500" :options="chartOptions" :series="series" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
     components:{
        apexcharts: VueApexCharts,
    },
    props:['art2Name', 'art2Total'],
    data: function(){
        return{
            series: [{
               name: 'Total',
            data: this.art2Total
          }],
          chartOptions: {
            chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                borderRadius: 4,
                horizontal: true,
              }
            },
            dataLabels: {
              enabled: false
            },
            xaxis: {
              categories: this.art2Name,
              labels: {
                    show: true,
                    style: {
                    colors: '#22c55e',
                    fontSize: '12px'
                    },
                },
            },
            yaxis: [
              {
                axisTicks: {
                  show: true,
                },
                labels: {
                  style: {
                    colors: '#22c55e',
                  }
                },
                tooltip: {
                  enabled: true
                }
              },
            ],
          },
        }
    }
}
</script>