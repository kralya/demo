<script src="/demo/js/sort.js"></script>
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

        <hr/>

        <ol>
            <li ng-repeat="message in messages">
                <div class="row single-message">
                    Author: {{message.name}}
                    <br/>
                    Email: {{message.email}}
                    <pre>Text: {{message.text}}</pre>
                    <input type="hidden" value="{{message.date}}"/>
                    <img ng-src="/demo/downloads/{{message.picture}}" ng-show="message.picture"/>
                    <span class="alert-warning">{{message.modified == '1' ? 'Modified by admin' : ''}}</span>
                </div>
            </li>
        </ol>

    </div>

    <div class="ng-hide" ng-show="showPreview">
        <h2 class="text-center">Response preview:</h2>
        <div class="row single-message">
            Author: {{name}}
            <br/>
            Email: {{email}}
            <pre>Text: {{text}}</pre>
            <input type="hidden" value="{{message.date}}"/>
        </div>
        <button ng-click="showPreview = false">Hide</button>
    </div>

    <h2 class="text-center">Add new response:</h2>

    <?php if (!empty($errors)){ ?>
    <?php foreach ($errors as $error) { ?>
    <div class="alert-danger"><?php echo $error ?></div>
    <?php } ?>
    <?php } ?>

   <?php if (!empty($successes)){ ?>
    <?php foreach ($successes as $success) { ?>
    <div class="alert-success"><?php echo $success ?></div>
    <?php } ?>
    <?php } ?>

    <form action='/demo/add' method='POST' class="form" enctype="multipart/form-data" >
        <div class="form-group">
            Your name: <input type="text" name="name" ng-model="name">
        </div>
        <div class="form-group">
            Your email: <input type="email" name="email" ng-model="email" required placeholder="Enter a valid email address">
        </div>
        <div>
            Text:<br/>
            <textarea name="text" rows="3" cols="30" ng-model="text"></textarea>
        </div>
        Image: <input type="file" size="32" name="image_field" value="">
        <input type="submit" name="submit" value="Submit">
    </form>

    <button ng-click="showPreview = ! showPreview">Preview</button>
</div>