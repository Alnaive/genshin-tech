<template>
    <apexcharts  width="500"  height="350" type="bar" class="text-green-500" :options="chartOptions" :series="series" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
     components:{
        apexcharts: VueApexCharts,
    },
    props:['art4Name','totalArt4', 'title'],
    data: function(){
        return{
            series: [{
               name: 'Total',
            data: this.totalArt4
          }],
         chartOptions: {
              chart: {
              width: '100%',
              type: 'bar'
              },
            title: {
                text: this.title + ' 4 Set Artifact',
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
            categories: this.art4Name,
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
            data: this.totalArt4,
        }],
        } 
         
        }
    }
</script>
<style>
 .apexcharts-tooltip-title{
    color:#008ffb;
 }
 .apexcharts-tooltip-text{
    color:#008ffb;
 }
</style>