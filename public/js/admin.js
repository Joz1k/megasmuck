var xValues = ["Прибыль", "Затраты", "Неизвестно?"];
var yValues = [50, 30, 20];
var barColors = [
  "rgb(25,135,84)",
  "rgb(220,53,69)",
  "rgb(248,249,250)",
];

new Chart("pieChart", {
  type: "doughnut",
  data: {
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Статистика золота"
    }
  }
});

var table = document.getElementById('carders');
var headers =[];
var items = document.getElementsByClassName("month");
var cards =[];
var values = document.getElementsByClassName("valuev");
for (var i = 0; i < $('#carders').children('li').length; i++) {
  headers[i] = items[i].textContent;
  cards[i] = values[i].textContent;
}

console.log(headers);
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: headers,
      datasets: [
        {
          label: "Рубли",
          backgroundColor: ["#2E8B57", "#228B22","#008000","#006400","#9ACD32"],
          data: cards
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Динамика продаж за месяц'
      }
    }
});