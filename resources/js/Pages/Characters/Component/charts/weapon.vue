<template>
    <apexcharts type="bar" class="flex justify-center mt-5 text-green-500" height="350"  :options="chartOptions" :series="series"></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
    components:{
        apexcharts: VueApexCharts,
    },

    props:['weapon_count','weapon_name','title'],
    
    data: function(){
        return{
            chartOptions: {
            chart: {
            width: '100%',
            type: 'bar'
            },
            title: {
                text: this.title + ' Weapon',
                align: 'left',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                fontSize:  '14px',
                fontWeight:  'bold',
                color:  '#22c55e'
                },
            },
            xaxis: {
            categories: this.weapon_name,
             labels: {
                    show: true,
                    style: {
                    colors: '#22c55e',
                    fontSize: '12px'
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
                    colors: '#22c55e',
                  }
                },
                tooltip: {
                  enabled: true
                }
              },
            ],
        },
        series: [{
            name: 'Total',
            data: this.weapon_count,
        }],
        }
    }
}
</script>