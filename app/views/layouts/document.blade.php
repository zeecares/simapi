@extends('layouts.default')

@section('content') 
<body>
  <h1>
    <h1@@end_of_comment
    <h1>
      <b class="Style">
        SImulAPi
      </b>
    </h1@@end_of_comment
      <h1>
  </h1>
  <h1@@end_of_comment
  <h1>
    
    <p>
      <strong>
        SImulAPi
      </strong>
      is designed to make it 
      <strong>
        easier
      </strong>
      for developers to use and get data from 
      <strong>
        BCTVB
      </strong>
    </p>
    <hr class="divider">
    <p>
      &nbsp;
    </p>
    

    
    <h1>
      OAUTH
    </h1>
    
    <p>
      Users login and logout
    </p>
    
    <h2>
      Login [/login]
    </h2>
    
    <h3>
      Authenticate the user and access token[POST]
    </h3>
    
    <ul>
      
      <li>
        
        <p>
          Request (application/json)
        </p>
        
        <pre>
<code>
{ "username": "user", "auth-key": "X124FBKAUHFORFHRIOHIO", "password": "password" }
</code>
</pre>
      
    </li>
    
    <li>
      Response 401
    </li>
    
  </ul>
  
  <h2>
    Logout [/logout]
  </h2>
  
  <h3>
    Redact authentication for the user [GET]
  </h3>
  
  <ul>
    
    <li>
      Response 204
    </li>
    
  </ul>
  
  <h1>
    <hr />
    Group Create a simulation instance
  </h1>
  
  <p>
    Create Instance of simulation for 
    <strong>
      SImulAPIi
    </strong>
  </p>
  
  <h2>
    Create Instance [/username/istance/{building_model}{time_step}{begin}{end}{weather_file}]
  </h2>
  
  <p>
    Create a single simulation instance with the number of building,how long is the time step,begin and end time along with the weather file.
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          building_model(required, numeric, 
          <code>
            1,2,3,4,5
          </code>
          ) ... The number of building model.
        </li>
        
        <li>
          time_step(required, numeric, 
          <code>
            1,5,10,15,30,45,60
          </code>
          )... The time of each step.
        </li>
        
        <li>
          begin(required, date, 
          <code>
            2013-02-28
          </code>
          ) ... The 
          <code>
            date
          </code>
          on which the simulation starts.
        </li>
        
        <li>
          end(required, date, 
          <code>
            2014-02-28
          </code>
          ) ... The 
          <code>
            date
          </code>
          on which the simulation ends.
        </li>
        
        <li>
          weather_file(required,file) ... The weather file selected by customers
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Create simulation instance [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
{
"building_model": 5
"time_step":10,
"begin":"2013-01-01",
"end":"2014-01-01",
"weather_file":"Chicago"
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Select Appliance  [/username/istance/{appliance_1}{appliance_2}{appliance_3}{appliance_4}{appliance_5}]
  </h2>
  
  <p>
    List the appliances that user want to control
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          appliance_1(required,boolean,
          <code>
            ture
          </code>
          ) ... The appliances that will be using during the simulation
        </li>
        
        <li>
          appliance_2(required,boolean,
          <code>
            flase
          </code>
          ) ... The appliances that will be using during the simulation
        </li>
        
        <li>
          appliance_3(required,boolean,
          <code>
            flase
          </code>
          ) ... The appliances that will be using during the simulation
        </li>
        
        <li>
          appliance_4(required,boolean,
          <code>
            ture
          </code>
          ) ... The appliances that will be using during the simulation
        </li>
        
        <li>
          appliance_5(required,boolean,
          <code>
            ture
          </code>
          ) ... The appliances that will be using during the simulation
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Choose appliance [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
{
"appliances_list": [
{"appliance_1":true,"appliance_3":true,"appliance_4":true}
]
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Select Sensors  [/username/istance/{sensor_1}{sensor_2}{sensor_3}{sensor_4}{sensor_5}]
  </h2>
  
  <p>
    Select sensors that user want to use
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          sensor_1(required,boolean,
          <code>
            true
          </code>
          ) ... The sensors that will be used in the simulation
        </li>
        
        <li>
          sensor_2(required,boolean,
          <code>
            flase
          </code>
          ) ... The sensors that will be used in the simulation
        </li>
        
        <li>
          sensor_3(required,boolean,
          <code>
            true
          </code>
          ) ... The sensors that will be used in the simulation
        </li>
        
        <li>
          sensor_4(required,boolean,
          <code>
            true
          </code>
          ) ... The sensors that will be used in the simulation
        </li>
        
        <li>
          sensor_5(required,boolean,
          <code>
            flase
          </code>
          ) ... The sensors that will be used in the simulation
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Choose sensors  [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
{
"sensors_list": [
{"sensor_1":true,"sensor_3":true,"sensor_4":true}
]
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Number of Occupants  [/username/istance/{occupants}]
  </h2>
  
  <p>
    Set the number of occupants in a building.
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          occupants(required,numeric,
          <code>
            2
          </code>
          ) ... The occupants that will in the building during the simulation
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Occupants  [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
{
"occupants": 3
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Temperture range  [/username/istance/{comfort_min}{comfort_max}]
  </h2>
  
  <p>
    Decide the comfortable temperture range
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          comfort_min(required,numeric,
          <code>
            18
          </code>
          ) ... The minimal comfortable temperature.
        </li>
        
        <li>
          comfort_max(required,numeric,
          <code>
            25
          </code>
          ) ... The maximal comfortable temperature. 
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Temperture range [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
{
"comfort_min": 16,
"comfort_max": 23
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Electricity price  [/username/istance/{e_price}]
  </h2>
  
  <p>
    Set the price of electricity during the simulation
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          e_price(required,numeric,
          <code>
            1,2...10
          </code>
          ) ... The price of electricity
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    electricity price [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
{
"e_price": 8
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Begin  [/username/istance/{begin}]
  </h2>
  
  <p>
    Users can begin the simulation with information inputed before
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          begin(required,boolean,
          <code>
            true
          </code>
          ) ... Set begin to true in order to begin the stimulation.
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Begin [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Request (application/json)
      </p>
      
      <pre>
<code>
{
"building_model": 5
"time_step":10,
"begin":"2013-01-01",
"end":"2014-01-01",
"weather_file":"Chicago",
"appliances_list": [
{"appliance_1":true,"appliance_2":false}
],
"sensors_list": [
{"sensor_1":true,
"sensor_3":true,
"sensor_5":false}
],
"occupants": 3,
"comfort_min": 16,
"comfort_max": 23
}
</code>
</pre>
      
    </li>
    
    <li>
      
      <p>
        Response 200
      </p>
      
      <pre>
<code>
{
"begin": true
}
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Go Next  [/username/istance/{next}]
  </h2>
  
  <p>
    Go to the next simulation time step with operations
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          next (required,boolean,
          <code>
            ture
          </code>
          ) ... Go to the next timestep
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Next [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Request (application/json)
      </p>
      
      <pre>
<code>
{
"next": true
}
</code>
</pre>
      
    </li>
    
    <li>
      Response 200
    </li>
    
  </ul>
  
  <h2>
    Actions  [/username/istance/next/{action}]
  </h2>
  
  <p>
    Control the appliances during simulation.At each timestep , use Actions to open a appliance or close one.
  </p>
  
  <h3>
    Next [PUT]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Request (application/json)
      </p>
      
      <pre>
<code>
{
"appliances_list": [
{"appliance_1":true,"appliance_3":true,"appliance_4":true}
]
}
</code>
</pre>
      
    </li>
    
    <li>
      Response 200
    </li>
    
  </ul>
  
  <h2>
    Value of sensors  [/username/istance/{sensors_value}]
  </h2>
  
  <p>
    Get the value of selected sensors
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          sensors_value(required,numric,
          <code>
            water_meter:1328
          </code>
          ) ... The value of selected sensors 
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Value of sensors [GET]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
[{
"water_meter": 125, "electricity_meter": 23821
}]
</code>
</pre>
      
    </li>
    
  </ul>
  
  <h2>
    Get Time  [/username/istance/{time}]
  </h2>
  
  <p>
    Get the time in the simulation
  </p>
  
  <ul>
    
    <li>
      
      <p>
        Parameters
      </p>
      
      <ul>
        
        <li>
          time(required,date,
          <code>
            2013-02-28 13:00
          </code>
          ) ... Get the time in the simulation
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
  <h3>
    Get the Time [GET]
  </h3>
  
  <ul>
    
    <li>
      
      <p>
        Response 200 (application/json)
      </p>
      
      <pre>
<code>
[
"time":"2012-12-2 18:00"
]
</code>
</pre>
      
    </li>   
  </ul>
  <br />
  </h1@@end_of_comment
  <h1>

</body>
@stop