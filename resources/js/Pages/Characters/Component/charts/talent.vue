<template>
    <apexcharts  width="500"  height="350" type="area" class="text-green-500" :options="chartOptions" :series="series" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
     components:{
        apexcharts: VueApexCharts,
    },
    props:['normalAttack','elementalSkill', 'elementalBurst', 'title'],
    data: function(){
        return{
        series: [
          {
              name: "Normal Attack",
              data: this.normalAttack
          },
          {
              name: "Elemental Skill",
              data: this.elementalSkill
          },
          {
              name: "Elemental Burst",
              data: this.elementalBurst
          }
          ],
          chartOptions: {
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: this.title + ' Talent Distribution',
              align: 'left',
               style: {
                    fontSize:  '14px',
                    fontWeight:  'bold',
                    color: '#9ca3af'
                  },
            },
            grid: {
              row: {
                colors: ['transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {
              categories: [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
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
        }
    }
}
</script>
<style>
    .apexcharts-legend-text{
        color: #9ca3af !important;
    }
</style>