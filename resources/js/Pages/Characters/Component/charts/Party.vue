<template>
    <apexcharts  width="500"  height="350" type="donut" :options="chartOptions1" :series="series1" ></apexcharts>
</template>

<script>
import VueApexCharts from 'vue3-apexcharts'

export default {
    components:{
        apexcharts: VueApexCharts,
    },
    props:['partyName','totalParty', 'title'],
    data: function(){
        return{
            series1: this.totalParty,
            chartOptions1: {
            chart: {
              width: '100%',
              type: 'pie',
            },
            labels: this.partyName,
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
              text: this.title +" Party Charts",
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