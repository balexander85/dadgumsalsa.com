from django.db import models

# Create your models here.

class resume_experience(models.Model):
	job_id = models.FloatField()
	company_name = models.TextField()
	job_location = models.CharField(max_length=100, unique=False)
	position_title = models.CharField(max_length=100, unique=False)
	dates_of_employment = models.CharField(max_length=100, unique=False)
	job_description = models.TextField()