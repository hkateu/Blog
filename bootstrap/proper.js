class App extends React.Component {
  state = {
    errorBoundaryKey: 0
  };

  handleRerenderButtonClick = () => this.forceUpdate();

  handleResetButtonClick = () =>
    this.setState(prevState => ({
      errorBoundaryKey: prevState.errorBoundaryKey + 1
    }));

  render() {
    return (
      <div className="App">
        <button onClick={this.handleRerenderButtonClick}>re-render</button>
        <button onClick={this.handleResetButtonClick}>
          reset error boundary
        </button>
        <ErrorBoundary key={this.state.errorBoundaryKey}>
          <ComponentThatMayError />
        </ErrorBoundary>
      </div>
    );
  }
}