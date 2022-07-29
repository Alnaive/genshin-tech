<template>
    <apexcharts  width="500"  height="350" type="area" class="text-green-500" :options="chartOptions" :series="series" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
     components:{
        apexcharts: VueApexCharts,
    },
    props:['t3Label','t3'],
    data: function(){
        return{
        series: [{
            name: 'Total',
            data: this.t3,
          }],
          chartOptions: {
            chart: {
              height: 350,
              type: 'area',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'smooth'
            },
            colors:['#22c44e'],
            title: {
              text: 'Elemental Burst Charts',
              align: 'left',
              style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                color:  '#22c55e'
                },
            },
            xaxis: {
              type: 'category',
              categories: this.t3Label,
              labels: {
                    show: true,
                    style: {
                    colors: '#22c55e',
                    fontSize: '12px'
                    },
                }
            },
            yaxis: {
              opposite: true,
              labels: {
                    show: true,
                    style: {
                    colors: '#22c55e',
                    fontSize: '12px'
                    },
                }
            },
            
          },
        }
    }
}
</script>
<style>
    .apexcharts-legend-text{
        color: #22c55e !important;
    }
</style>