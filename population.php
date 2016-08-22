<html>

<head>
<style type="text/css">
		label{
			display:block;
			margin:6px 0;
			overflow:hidden;
			float:none;
		}
		.countryHeader{
			font-weight:bold;
			text-decoration:underline;
			display:block;
			font-size:1.2em;
		}
		.countryCheckboxes{
			-moz-column-count: 3;
			-moz-column-gap: 15px;
			-webkit-column-count: 3;
			-webkit-column-gap: 15px;
			column-count: 3;
			column-gap: 15px; 
		}
	</style>
<title>nThrive Test</title>
<script src="http://d3js.org/d3.v3.min.js"></script>
</head>

<body>
<script>
   d3.json("http://ec2-54-213-52-202.us-west-2.compute.amazonaws.com/nthrive/myjson.json",function(data){



   var width = 1500;
   var height = 6000;

   var widthScale = d3.scale.linear()
		    .domain([0,100])
		    .range([0,width]);

   var axis = d3.svg.axis()
              .scale(widthScale);


   var color = d3.scale.linear()
	       .domain([62,90])
	       .range(["red","green"]);


   var canvas = d3.select("body").append("svg")
				.attr("width",width)
				.attr("height",height)
			        .append("g")
				.attr("transform","translate(50,100)")	
   

   var bars   =	canvas.selectAll("rect")
				.data(data)
				.enter()
					.append("rect")
					.attr("width",function(d){return widthScale(d.lifeExp);})
					.attr("height",48)
					.attr("y",function (d,i){return i*50;})
					.attr("fill",function(d){ return color(d.lifeExp); })
				        .attr("id","bar")
					 .on("click",function(){
                                                var active = textID.active ? false: true;
                                                newOpacity = active ? 0 : 1;
                                                d3.selectAll("#textID").style("opacity",newOpacity);
                                                textID.active = active;
                                          })		
						

				       canvas.selectAll("text")
				      .data(data)
				      .enter()
					 .append("text")
					 .attr("fill","white")
					 .style("opacity",0)
					 .attr("id","textID")
					 .attr("y",function (d,i){return i*50+24;})
					 .text(function(d){return "Country:"+d.country +",Total Population: "+ d.population;})
				canvas.append("g")
				.attr("transform","translate(0,300)") 
   				.call(axis)
 		                .append("text")
  			        .attr("transform","translate(700,50)") 
			        .style("text-anchor", "middle")
			        .text("Years");

   })
   </script>
<p>Following page shows a bar graph of population of a country vs its life expectancy</p>
<p>Select up to 5 countries</p>
<form action="http://ec2-54-213-52-202.us-west-2.compute.amazonaws.com/nthrive/requestProcessor.php" method="post">
		<span class="countryHeader">Africa</span>
		<div class="countryCheckboxes" id="AfricaCountries" >
			<label for="Algeria" >
				<input type="checkbox" name="Algeria" id="Algeria" value="Algeria"> 
				Algeria
			</label>
			<label for="Angola, Republic of" >
				<input type="checkbox" name="Angola" id="Angola" value="Angola">
				Angola
			</label>
			<label for="Benin" >
				<input type="checkbox" name="Benin" id="Benin">
				Benin
			</label>
			<label for="Ghana" >
				<input type="checkbox" name="Ghana" id="Ghana">
				Ghana
			</label>			
		</div>
 
		<span class="countryHeader">Asia</span>
		<div class="countryCheckboxes" id="AsiaCountries">
			<label for="Afghanistan" >
				<input type="checkbox" name="Afghanistan" id="Afghanistan">
				Afghanistan
			</label>
			<label for="Bangladesh" >
				<input type="checkbox" name="Bangladesh" id="Bangladesh">
				Bangladesh
			</label>
			<label for="China" >
				<input type="checkbox" name="China" id="China">
				China
			</label>
			<label for="India" >
				<input type="checkbox" name="India" id="India">
				India
			</label>
			<label for="Japan" >
				<input type="checkbox" name="Japan" id="Japan">
				Japan
			</label>
			<label for="Nepal" >
				<input type="checkbox" name="Nepal" id="Nepal">
				Nepal
			</label>			
		</div>
 
		<span class="countryHeader">Europe</span>
		<div class="countryCheckboxes"  id="EuropeCountries" >
			<label for="Belgium" >
				<input type="checkbox" name="Belgium" id="Belgium">
				Belgium
			</label>
			<label for="Denmark" >
				<input type="checkbox" name="Denmark" id="Denmark"> 
				Denmark
			</label>
			<label for="Norway" >
				<input type="checkbox" name="Norway" id="Norway">
				Norway
			</label>
			<label for="Portugal" >
				<input type="checkbox" name="Portugal" id="Portugal">
				Portugal
			</label>
			<label for="Romania" >
				<input type="checkbox" name="Romania" id="Romania">
				Romania
			</label>
			<label for="Ukraine" >
				<input type="checkbox" name="Ukraine" id="Ukraine">
				Ukraine
			</label>			
		</div>
 
		<span class="countryHeader">North America</span>
		<div class="countryCheckboxes" id="NorthAmericaCountries">
			<label for="Anguilla" >
				<input type="checkbox" name="Anguilla" id="Anguilla">
				Anguilla
			</label>			
			<label for="Aruba" >
				<input type="checkbox" name="Aruba" id="Aruba"> 
				Aruba
			</label>			
			<label for="Barbados" >
				<input type="checkbox" name="Barbados" id="Barbados"> 
				Barbados
			</label>			
			<label for="Canada" >
				<input type="checkbox" name="Canada" id="Canada"> 
				Canada
			</label>			
			<label for="Mexico" >
				<input type="checkbox" name="Mexico" id="Mexico">
				Mexico
			</label>
		</div>
<br>
<p> Select a year</p>
<select name="years">
  <option value="1980">1980</option>
  <option value="1981">1981</option>
  <option value="1982">1982</option>
  <option value="1983">1983</option>
  <option value="1984">1984</option>
  <option value="1985">1985</option>
  <option value="1986">1986</option>
  <option value="1987">1987</option>
  <option value="1988">1988</option>
  <option value="1989">1989</option>
  <option value="1990">1990</option>
  <option value="1991">1991</option>
  <option value="1992">1992</option>
  <option value="1993">1993</option>
  <option value="1994">1994</option>
  <option value="1995">1995</option>
  <option value="1996">1996</option>
  <option value="1997">1997</option>
  <option value="1998">1998</option>
  <option value="1999">1999</option>
  <option value="2001">2001</option>
  <option value="2002">2002</option>
  <option value="2003">2003</option>
  <option value="2004">2004</option>
  <option value="2005">2005</option>
  <option value="2006">2006</option>
  <option value="2007">2007</option>
  <option value="2008">2008</option>
  <option value="2009">2009</option>
  <option value="2010">2010</option>
  <option value="2011">2011</option>
  <option value="2012">2012</option>
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>

</select>
<br>
<input type="submit">	
	</form>

  <img src="legend.jpg" alt="population map">
<p>Double click on the bar below to get more info about the countries...</p>
<br> 
</body>
   </html>
