from django.shortcuts import render_to_response
from resume.models import resume_experience
from resume.models import resume_objective
from resume.models import resume_education
from resume.models import resume_skills
from resume.models import resume_interest
from resume.models import resume_projects


def index(request):
    return render_to_response('resume/resume.html',
	{
	'objectives': resume_objective.objects.all(),
	'jobs': resume_experience.objects.all().order_by('id').reverse(),
	'education': resume_education.objects.all(),
	'skills': resume_skills.objects.all(),
	'special_interest': resume_interest.objects.all(),
	'projects': resume_projects.objects.all(),
    })
