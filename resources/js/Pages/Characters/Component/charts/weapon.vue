<template>
    <apexcharts type="bar" class="flex justify-center mt-5 " width="500" height="350"  :options="chartOptions" :series="series"></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'
import { toggleDarkMode, isDark } from '@/Composables'

export default {
    components:{
        apexcharts: VueApexCharts,
    },

    props:['totalWeapon','weaponName','title'],
    setup(){
      isDark
    },
    data(){
        return{
            chartOptions: {
              chart: {
              width: '100%',
              type: 'bar'
              },
            title: {
                text: this.title + ' Artifact',
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
            categories: this.weaponName,
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
            data: this.totalWeapon,
        }],
        }
    },
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