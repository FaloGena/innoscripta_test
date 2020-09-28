# Sample of non-existing pizza-delivery web app.

Mostly ajax client-side interface.
Session storing temporary order.
Currency changer (usd<=>eur), prices for each are stored in product rows. 
Order history for logged in users, aswell as saved addresses (that could be used to send order).
Code split to different small classes and methods so its parts could be used as modules and implemented (maybe with a little changes cause of lack of time) to another code structure, and it's easier to maintain.
Most non-obvious methods have DocBlocks.
Design and css are not my strongest skills so yeah.
For best experience please use Google Chrome ~v85 and screen > 1200px width.

Were used:
- Backend:
  - Base Laravel framework v7.28
  - Laravel mix
  - ext-json dependency
  - PHP 7.3
  - MySQL 5.7
- Frontend:
  - Bootstrap v4.5
  - Font awesome
  - Slick
  - Google fonts
  - jQuery v3.5.1
- Laravel debugbar and ide-helper for development
