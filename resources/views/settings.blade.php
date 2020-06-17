@extends('layouts.app') @section('content')
<div class="container">

    <div class="columns is-multiline">
        <div class="column">
        
        </div>
        <div class="column">
        
        </div>
    </div>
    <h3 style="color:#ffd419" class="title is-warning">Settings</h3>
    <table class="table is-fullwidth">
        <thead>
          
        </thead>
        <tbody>

           <tr>
               <td>
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
            <td>
             <span>Zone Update time <span class="tag is-rounded is-warning">05:00 am</span></span>
            </td>
            <td>
             <div class="select">
               <select  style="color:white;background-color:black;width:150px;">
                   <option>GMT</option>
                   <option>UMI</option>
                   <option>KSA</option>
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
                Set members notifications in silent mode
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
                <a style="color:white" href="/change" class="button is-small  has-background-grey-light">Change password</a>
            </td>
            <td>
            </td>
        </tr>

        <tr>
            <td>
                <a href="#" style="color:grey" class="is-warning">Delete account</a>
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