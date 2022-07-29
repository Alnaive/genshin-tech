<template>
    <apexcharts  width="500"  height="350" type="donut" :options="chartOptions1" :series="series1" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
    components:{
        apexcharts: VueApexCharts,
    },
    props:['q1_total','q1_value', 'title'],
    data: function(){
        return{
            series1: this.q1_total,
            chartOptions1: {
            chart: {
              width: '100%',
              type: 'pie',
            },
            labels: this.q1_value,
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
              text: "Is User Interface Friendly?",
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