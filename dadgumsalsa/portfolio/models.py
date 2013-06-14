from django.db import models


class daily_balances(models.Model):
    log_date = 'date'
    symbol = 'NYSE'
    security_name = 'name'
    security_qty = '###.#####'
    security_price = '#####.####'
