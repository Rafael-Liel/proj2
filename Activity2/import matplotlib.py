import matplotlib.pyplot as plt

# Pie Chart: User Role Distribution
roles = ['Volunteers', 'Event Organizers', 'Donors']
percentages = [60, 30, 10]
colors = ['#66b3ff', '#99ff99', '#ffcc99']

plt.figure(figsize=(10, 5))

# Plot Pie Chart
plt.subplot(1, 2, 1)
plt.pie(percentages, labels=roles, autopct='%1.1f%%', startangle=140, colors=colors, explode=[0.05, 0.05, 0.05])
plt.title('User Role Distribution')

# Bar Graph: Feature Engagement Estimates
features = [
    'Sign Up / Log In', 'Browse Opportunities', 'Register for Events',
    'Post Volunteer Opportunities', 'Manage Events', 'Manage Volunteer Pool',
    'Accept Donations', 'Send Messages / Updates', 'Track Engagement'
]
engagement = [100, 85, 75, 30, 28, 25, 10, 60, 40]

plt.subplot(1, 2, 2)
bars = plt.barh(features, engagement, color='#4c72b0')
plt.xlabel('Estimated Engagement (%)')
plt.title('Feature Engagement Estimates')
plt.xlim(0, 110)

# Add value labels on bars
for bar in bars:
    width = bar.get_width()
    plt.text(width + 1, bar.get_y() + bar.get_height()/2, f'{width}%', va='center')

plt.tight_layout()
plt.show()
