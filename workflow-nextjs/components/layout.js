import Header from './header'

const layoutStyle = {
  margin: 0,
  padding: 0,
  // border: '1px solid #DDD'
}


export default function Layout(props) {
  console.log('Layout props', props);
  return (
    <div style={layoutStyle}>
      <Header {...props}/>
      {props.children}
    </div>
  )
}
