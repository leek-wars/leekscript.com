var c = document.getElementById('background')
c.width = window.innerWidth
c.height = 560;
var ctx = c.getContext("2d")
ctx.clearStyle = 'black'
var x = c.width / 2
var y = c.height / 2
var mx = -1000, my = -1000
var N = 50
var F = 70
var S = 2
var deform = function(x, y) {
	var d = Math.sqrt(Math.pow(x - mx, 2) + Math.pow(y - my, 2))
	var f = Math.max(0, F - d) / (S * F)
	return [x + (x - mx) * f, y + (y - my) * f]
}
var triangle = function(x1, y1, x2, y2, x3, y3, alpha, blue) {
	ctx.beginPath();
	var p1 = deform(x1, y1)
	var p2 = deform(x2, y2)
	var p3 = deform(x3, y3)
	ctx.moveTo(p1[0], p1[1])
	ctx.lineTo(p2[0], p2[1])
	ctx.lineTo(p3[0], p3[1])
	ctx.closePath()
	var distance = Math.sqrt(Math.pow(mx - x1, 2) + Math.pow(my - y1, 2))
	var amount = 1 + Math.max(0, F - distance) / (0.2 * F)
	if (blue) {
		ctx.lineWidth = amount
		ctx.strokeStyle = 'rgba(0,166,255,' + 0.7 + ')';
		ctx.stroke()
		ctx.lineWidth = 1
	} else {
		ctx.strokeStyle = 'rgba(255,255,255,' + (amount * alpha) + ')';
		ctx.stroke()
	}
}
var data = []
for (var j = 0; j < N; ++j) {
	var d = []
	for (var i = 0; i < N; ++i) {
		var alpha = Math.random() * (0.15 * Math.random())
		var blue = Math.random() < 0.003
		var alpha2 = Math.random() * (0.15 * Math.random())
		var blue2 = Math.random() < 0.003
		d.push([alpha, blue, alpha2, blue2])
	}
	data.push(d)
}
var frame = function() {
	ctx.fillStyle = "#222";
	ctx.fillRect(0, 0, c.width, c.height);
	ctx.fillStyle = "#2a2a2a";
	x += (mx - x) / 20
	y += (my - y) / 20
	var w = c.width / N
	var h = w * 0.8
	var NY = c.height / h
	for (var j = 0; j < NY; ++j) {
		for (var i = 0; i < N; ++i) {
			var tx = i * w + (j % 2) * w * 0.5
			var ty = j * h;
			triangle(tx, ty, tx + w, ty, tx + 0.5 * w, ty + h, data[j][i][0], data[j][i][1])
			triangle(tx + w, ty, tx + 1.5 * w, ty + h, tx + 0.5 * w, ty + h, data[j][i][2], data[j][i][3])
		}
	}
}
document.body.onmousemove = function(e) {
	mx = e.pageX
	my = e.pageY
	window.requestAnimationFrame(frame)
}
frame()
