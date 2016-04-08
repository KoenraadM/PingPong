# PingPong

## Requirements

### Basic

- Keeping score for a 1v1 pingpong match
- Keeping score for a 2v2 pingpong match

### Extended

- provide an API for scores etc







# Errors

Controller throwt error als ge een Error wilt teruggeven (400, 404, 500, ...)
Hook event listener in op "kernel.Exception"
Laat die checken of ge een nuttige exception zijt
Genereer uw error JSON message en return dat

# Success

Controller geef DTO object terug (dat object dat die array die we in de branch Populator gebruikt hebben)
Hook event listener in op "kernlen.view"
Laat die checken of ge een DTO object hebt gegeven, zo niet, throw normale exception die Symf throwt als ge geen 'Response Object' teruggeeft (standaard Symf)
Vorm DTO object om naar JsonResponse
en klaar
