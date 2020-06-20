@extends('layouts.app') @section('content')
<div class="container" style="margin-top:-30px;">


    <h3 style="color:#ffd419" class="title is-warning">Settings</h3>
    <table class="table is-fullwidth">
        <thead>
          
        </thead>
        <tbody>

           <tr>
               <td style="padding-top: 20px;">
                <span>Language</span>
               </td>
               <td>
                <div class="select">
                  <select  style="color:white;background-color:black;width:150px;">
                      <option>English</option>
                      <option>French</option>
                  </select>
                </div>
               </td>
           </tr>

           <tr>
            <td style="padding-top: 20px;">
             <span>Zone Update time <span class="tag is-rounded is-warning">{{ session('hour') }}</span></span>
            </td>
            <td>
             <div class="select">
               <select  onchange="window.open('/settings?zone='+this.value,'_self');" style="color:white;background-color:black;width:150px;">
                <option {{ session('zone') == 'GMT-12' ? 'selected': ''}}> GMT-12  </option>
                <option {{ session('zone') == 'GMT-11.5' ? 'selected': ''}}> GMT-11.5  </option>
                <option {{ session('zone') == 'GMT-11' ? 'selected': ''}}> GMT-11 </option>
                <option {{ session('zone') == 'GMT-10.5' ? 'selected': ''}}> GMT-10.5  </option>
                <option {{ session('zone') == 'GMT-10' ? 'selected': ''}}> GMT-10  </option>
                <option {{ session('zone') == 'GMT-9.5' ? 'selected': ''}}> GMT-9.5  </option>
                <option {{ session('zone') == 'GMT-9' ? 'selected': ''}}> GMT-9  </option>
                <option {{ session('zone') == 'GMT-8.5' ? 'selected': ''}}> GMT-8.5  </option>
                <option {{ session('zone') == 'GMT-8' ? 'selected': ''}}> GMT-8  </option>
                <option {{ session('zone') == 'GMT-7.5' ? 'selected': ''}}> GMT-7.5  </option>
                <option {{ session('zone') == 'GMT-7' ? 'selected': ''}}> GMT-7 </option>
                <option {{ session('zone') == 'GMT-6.5' ? 'selected': ''}}>  GMT-6.5  </option>
                <option {{ session('zone') == 'GMT-6' ? 'selected': ''}}> GMT-6  </option>
                <option {{ session('zone') == 'GMT-5.5' ? 'selected': ''}}> GMT-5.5  </option>
                <option {{ session('zone') == 'GMT-5' ? 'selected': ''}}> GMT-5  </option>
                <option {{ session('zone') == 'GMT-4.5' ? 'selected': ''}}> GMT-4.5  </option>
                <option {{ session('zone') == 'GMT-4' ? 'selected': ''}}> GMT-4  </option>
                <option {{ session('zone') == 'GMT-3.5' ? 'selected': ''}}> GMT-3.5  </option>
                <option {{ session('zone') == 'GMT-3' ? 'selected': ''}}> GMT-3  </option>
                <option {{ session('zone') == 'GMT-2.5' ? 'selected': ''}}> GMT-2.5  </option>
                <option {{ session('zone') == 'GMT-2' ? 'selected': ''}}> GMT-2  </option>
                <option {{ session('zone') == 'GMT-1.5' ? 'selected': ''}}> GMT-1.5  </option>
                <option {{ session('zone') == 'GMT-1' ? 'selected': ''}}> GMT-1 </option>
                <option {{ session('zone') == 'GMT-0.5' ? 'selected': ''}}>  GMT-0.5 </option>
                <option {{ session('zone') == 'GMT' ? 'selected': ''}}> GMT </option>
                <option {{ session('zone') == 'GMT+0.5' ? 'selected': ''}}> GMT+0.5 </option>
                <option {{ session('zone') == 'GMT+1' ? 'selected': ''}}> GMT+1 </option>
                <option {{ session('zone') == 'GMT+1.5' ? 'selected': ''}}>  GMT+1.5  </option>
                <option {{ session('zone') == 'GMT+2' ? 'selected': ''}}> GMT+2  </option>
                <option {{ session('zone') == 'GMT+2.5' ? 'selected': ''}}> GMT+2.5  </option>
                <option {{ session('zone') == 'GMT+3' ? 'selected': ''}}> GMT+3  </option>
                <option {{ session('zone') == 'GMT+3.5' ? 'selected': ''}}> GMT+3.5  </option>
                <option {{ session('zone') == 'GMT+4' ? 'selected': ''}}> GMT+4  </option>
                <option {{ session('zone') == 'GMT+4.5' ? 'selected': ''}}> GMT+4.5  </option>
                <option {{ session('zone') == 'GMT+5' ? 'selected': ''}}> GMT+5  </option>
                <option {{ session('zone') == 'GMT+5.5' ? 'selected': ''}}> GMT+5.5  </option>
                <option {{ session('zone') == 'GMT+6' ? 'selected': ''}}>   GMT+6  </option>
                <option {{ session('zone') == 'GMT+6.5' ? 'selected': ''}}> GMT+6.5  </option>
                <option {{ session('zone') == 'GMT+7' ? 'selected': ''}}> GMT+7  </option>
                <option {{ session('zone') == 'GMT+7.5' ? 'selected': ''}}> GMT+7.5  </option>
                <option {{ session('zone') == 'GMT+8' ? 'selected': ''}}> GMT+8  </option>
                <option {{ session('zone') == 'GMT+0.5' ? 'selected': ''}}> GMT+8.5 </option>
                <option {{ session('zone') == 'GMT+9' ? 'selected': ''}}> GMT+9 </option>
                <option {{ session('zone') == 'GMT+9.5' ? 'selected': ''}}> GMT+9.5  </option>
                <option {{ session('zone') == 'GMT+10' ? 'selected': ''}}> GMT+10  </option>
                <option {{ session('zone') == 'GMT+10.5' ? 'selected': ''}}> GMT+10.5 </option>
                <option {{ session('zone') == 'GMT+11' ? 'selected': ''}}> GMT+11  </option>
                <option {{ session('zone') == 'GMT+11.5' ? 'selected': ''}}> GMT+11.5  </option>
                <option {{ session('zone') == 'GMT+12' ? 'selected': ''}}> GMT+12  </option>
                <option {{ session('zone') == 'GMT+12.5' ? 'selected': ''}}> GMT+12.5  </option>
                <option {{ session('zone') == 'GMT+13' ? 'selected': ''}}> GMT+13  </option>
               </select>
             </div>
            </td>
           </tr>

           <tr>
            <td>
                Show username
            </td>
            <td>
                <div class="field">
                  <input class="switch is-medium is-rounded is-warning" checked="checked"  type="checkbox" id="switch" name="switch">
                  <label for="switch"></label>
                </div>
            </td>
           </tr>

           <tr>
            <td>
                Set community notifications in silent mode
            </td>
            <td>
                <div class="field" >
                  <input class="switch is-medium is-rounded is-warning" checked="checked"  type="checkbox" id="switch2" name="switch">
                  <label for="switch2"></label>
                </div>
            </td>
           </tr>

           <tr>
            <td>
                Show transactions username
            </td>
            <td>
                <div class="field">
                  <input class="switch is-medium is-rounded is-warning" checked="checked"  type="checkbox" id="switch3" name="switch">
                  <label for="switch3"></label>
                </div>
            </td>
           </tr>

        <tr>
            <td>
                <a style="color:white" href="/change"  class="button is-small  has-background-grey-light">
                    <span>Change password </span>
                    <span class="icon is-small">
                      <i class="fas fa-lock"></i>
                    </span>
                </a>
            </td>
            <td>
            </td>
        </tr>

        <tr>
            <td>
                <a style="color:grey" href="/change"  class="is-warning">
                    <span>Delete password </span>
                   
                </a>
            </td>
            <td>
            </td>
        </tr>

        </tbody>
        <tfoot>

        </tfoot>
    </table>
    
</div>

@endsection