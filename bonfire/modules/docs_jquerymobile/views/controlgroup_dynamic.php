<h1>Dynamic controlgroup</h1>

        <p>This demo shows how you can dynamically make changes to a controlgroup.</p>

        <div data-demo-html="true" data-demo-js="true">

            <form>
            	<div class="ui-body ui-body-d ui-corner-all">
                	<p>Controlgroup...</p>
                	<div data-role="controlgroup" id="my-controlgroup"><!-- items will be injected here --></div>
                </div>
            </form>

            <div class="ui-field-contain">
                <label for="prepend">Add item</label>
                <button id="prepend" data-mini="true" data-inline="true">Prepend</button>
                <label for="append" class="ui-hidden-accessible">Action</label>
                <button id="append" data-mini="true" data-inline="true">Append</button>
            </div>

            <form action="#" method="get">
            	<div class="ui-field-contain">
                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
                        <legend>Widget type</legend>

                        <input type="radio" name="radio-widget" id="link" value="link" checked="checked">
                        <label for="link">Link</label>

                        <input type="radio" name="radio-widget" id="select" value="select">
                        <label for="select">Select</label>

                        <input type="radio" name="radio-widget" id="checkbox" value="checkbox">
                        <label for="checkbox">Checkbox</label>
                    </fieldset>
            	</div>

            	<div class="ui-field-contain">
                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
                        <legend>Action<br><small>on click/change</small></legend>

                        <input type="radio" name="radio-action" id="remove" value="remove" checked="checked">
                        <label for="remove">Remove</label>

                        <input type="radio" name="radio-action" id="hide" value="hide">
                        <label for="hide">Hide</label>

                        <input type="radio" name="radio-action" id="width" value="width">
                        <label for="width">Nothing</label>
                    </fieldset>
            	</div>

            	<div class="ui-field-contain">
                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
                        <legend>Switch orientation</legend>

                        <input type="radio" name="radio-orientation" id="isVertical" value="isVertical" checked="checked">
                        <label for="isVertical">Vertical</label>

                        <input type="radio" name="radio-orientation" id="isHorizontal" value="isHorizontal">
                        <label for="isHorizontal">Horizontal</label>
                    </fieldset>
            	</div>

            </form>

        </div><!--/demo-html -->