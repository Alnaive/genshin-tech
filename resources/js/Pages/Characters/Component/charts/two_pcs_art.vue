<template>
    <apexcharts  width="500"  height="350" type="bar" :options="chartOptions" :series="series" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
     components:{
        apexcharts: VueApexCharts,
    },
    props:['art2Name', 'totalArt2', 'title'],
    data: function(){
        return{
         chartOptions: {
              chart: {
              width: '100%',
              type: 'bar'
              },
            title: {
                text: this.title + ' 2 Set Artifact',
                align: 'left',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                color: '#9ca3af'
                },
            },
            xaxis: {
            categories: this.art2Name,
             labels: {
                    show: true,
                    style: {
                    colors: '#9ca3af',
                    fontSize: '12px',
                    fontWeight:  'bold',
                    },
                }
            },
            yaxis: [
              {
                axisTicks: {
                  show: true,
                },
                labels: {
                  style: {
                    fontWeight:  'bold',
                    colors: '#9ca3af',
                  }
                },
                tooltip: {
                  enabled: true,
                        fillSeriesColor: true,
                              theme: true,
                  style: {
                    fontSize:  '14px',
                    fontWeight:  'bold',
                    color: '#9ca3af'
                  },
                }
              },
            ],
        },
        series: [{
            name: 'Total',
            data: this.totalArt2,
        }],
        }
    }
}
</script>