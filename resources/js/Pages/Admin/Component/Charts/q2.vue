<template>
    <apexcharts  width="500"  height="350" type="donut" :options="chartOptions1" :series="series1" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
    components:{
        apexcharts: VueApexCharts,
    },
    props:['q2_total','q2_value', 'title'],
    data: function(){
        return{
            series1: this.q2_total,
            chartOptions1: {
            chart: {
              width: '100%',
              type: 'pie',
            },
            labels: this.q2_value,
            theme: {
              monochrome: {
                enabled: false
              }
            },
            plotOptions: {
              pie: {
                dataLabels: {
                  // offset: -5
                }
              }
            },
            title: {
              text: "Is The Main Feature Statistic helpful?",
              style:{
                  color:'#22c55e'
              }
            },
            dataLabels: {
              formatter(val, opts) {
                const name = opts.w.globals.labels[opts.seriesIndex]
                return [name, val.toFixed(1) + '%']
              }
            },
            legend: {
              show: false
            }
          },
        }
    }
}
</script>