<template>
  <div class="mt-3 text-sm text-zinc-500 flex justify-between items-center">
    <p class="set_date">{{ today }}</p>
    <p class="set_time">{{ hours }}:{{ minutes }} {{ period }}</p>
  </div>
  <p class="text-xl font-semibold mt-2 text-purple-500">
    To-do List
  </p>
</template>

<script>
export default {
  name: 'TodoHeader',
  data() {
    return {
      today: '',
      hours: 0,
      minutes: 0,
      period:','
    }
  },
  methods: {
    setTime() {
      const optionDate = {
        year: 'numeric', month: 'long', day: 'numeric' 
      }
      setInterval(() => {
        const date = new Date()
        this.today = date.toLocaleDateString('pt-BR',optionDate)
        this.hours = date.getHours()
        if(date.getHours() < 12){
          this.period = 'AM'
        }else{
          this.period = 'PM'
        }
        this.minutes = this.checkSingleDigit(date.getMinutes())
      },500)
    },
    checkSingleDigit (digit) {
      return ('0' + digit).slice(-2)
    }
  },
  mounted() {
    this.setTime()
  },
}
</script>
