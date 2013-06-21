from django.db import models


class daily_balances(models.Model):
    log_date = models.CharField(max_length=20, unique=False)
    symbol = models.CharField(max_length=100, unique=False)
    security_name = models.TextField()
    security_qty = models.FloatField()
    security_price = models.FloatField()
