<script src="/demo/js/sortall.js"></script>
<h2 class="text-center">Admin template</h2>

<div class="container">
    <h2 class="text-center">List of responses:</h2>

    <div ng-controller="ExampleController">

        Sort by
        <button ng-click="sortBy('name')">Name</button>
        <span class="sortorder" ng-show="propertyName === 'name'" ng-class="{reverse: reverse}"></span>
        <button ng-click="sortBy('email')">Email</button>
        <span class="sortorder" ng-show="propertyName === 'email'" ng-class="{reverse: reverse}"></span>
        <button ng-click="sortBy('date')">Date</button>
        <span class="sortorder" ng-show="propertyName === 'date'" ng-class="{reverse: reverse}"></span>
        <form action="/demo/logout"><input type="submit" name="logout" value="Logout"/></form>
        <hr/>

        <ol>
            <li ng-repeat="message in messages">
                <div class="row single-message">
                    Author: {{message.name}}
                    <br/>
                    Email: {{message.email}}
                    <br/>
                    <span class="alert-info">{{message.approved == '1'? 'Approved' : (message.approved == '2' ? 'Disapproved' : 'Unchecked')}}</span>
                    <br/>
                    <input type="hidden" value="{{message.date}}"/>
                    <form action="/demo/update" method="POST">
                        <input type="hidden" name="id" value="{{message.id}}"/>
                    Text: <textarea name="text">{{message.text}}</textarea>
                        <input type="submit" value="Update"/>
                    </form>

                    <form action="/demo/approve" method="POST">
                        <input type="hidden" name="id" value="{{message.id}}"/>
                        <input type="submit" name="submit" ng-show="message.approved !== '1'" value="Approve"/>
                        <input type="submit" name="submit" ng-show="message.approved !== '2'" value="Disapprove"/>
                    </form>
                    <img ng-src="/demo/downloads/{{message.picture}}" ng-show="message.picture"/>
                </div>
                <hr/>
            </li>
        </ol>

    </div>

</div>